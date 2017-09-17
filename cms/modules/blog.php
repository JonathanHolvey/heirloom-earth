<?php
include(dirname(__FILE__) . "/../libraries/parsedown.php");
include("config.php");

$config = new Config;
define("POSTS_PATH", dirname(__FILE__) . "/" . $config->get("blog", "posts-path"));
define("POST_REGEX", "/^[-\d]{10}-.+?\.md$/");

class BlogPost {
	// load blog post using permalink string or filename $post
	function __construct($post = NULL) {
		if (preg_match(POST_REGEX, $post) === 1)
			$fileName = $post;
		else {
			// find matching blog post file or use first if $post not specified
			$fileList = preg_grep("/^[-\d]{10}-.+\.md$/", scandir(POSTS_PATH));
			foreach ($fileList as $fileName) {
				if (preg_match("/^[-\d]{10}-" . $post . "*\.md$/", $fileName))
					break;
			}
		}
		$this->fileContents = file_get_contents(POSTS_PATH . "/" . $fileName);
		// load post metadata from file header into object properites
		foreach ($this->getPostInfo() as $property => $value)
			$this->$property = $value;
		// load post metadata extracted from body into object properties
		$this->image = $this->getPostImage();
		$this->intro = $this->getPostIntro();
		// load the post body itself
		$this->body = $this->getPostBody();
	}

	// check if the post matches the field and match properties of the blogFilter object
	public function matchFilter($filter) {
		if (is_null($filter->match))
			return true;
		// define array of fields to allow matches with
		$fields = array("tags", "category", "title", "author", "body");
		// create array of fields to match and search in each
		if ($filter->field != null) $fields = array_intersect($fields, array($filter->field));
		foreach($fields as $field) {
			// create array of values to match against
			$values = array_map("strtolower", ((array)$this->$field));
			foreach ($values as $value) {
				if ((!$filter->strict and stripos($value, $filter->match) !== false) or strtolower($value) == strtolower($filter->match))
					return true;
			}
		}
		return false;
	}

	// parse metadata into array
	private function getPostInfo() {
		preg_match("/^---\s(.+?)\s---/s", $this->fileContents, $matches);
		preg_match_all("/^(.+?)\: ?(.*?)\s?$/m", trim($matches[1]), $matches);
		foreach ($matches[2] as $key => $value)
			$matches[2][$key] = $this->splitArray($value);
		return array_combine($matches[1], $matches[2]);
	}

	// parse post body into string as html
	private function getPostBody() {
		$parsedown = new Parsedown;
		preg_match("/.+?---\s(.+)/s", $this->fileContents, $matches);
		return $parsedown->text(trim($matches[1]));
	}

	// get url of first image in post body
	private function getPostImage() {
		if (preg_match("/!\[.*?\]\((.+?)\)/s", $this->fileContents, $matches) == 1)
			return $matches[1];
		else return "";
	}

	// get first paragraph from post body and remove images and hyperlinks
	private function getPostIntro() {
		$parsedown = new Parsedown;
		preg_match("/.+?---\s.+?^(\w[^\n]{0,140}[^\n]*?[.!?])/sm", $this->fileContents, $matches);
		return $parsedown->text(preg_replace("/!?\[.*\]\(.+\)/", "", $matches[1]));
	}

	// splits yaml array strings into php arrays
	private function splitArray($string) {
		if (preg_match("/^\[.+\]$/", $string))
			return array_map("trim", explode(",", preg_replace(array("/^\[/", "/\]$/"), "", $string)));
		else
			return $string;
	}
}

class BlogList {
	public $list = [];
	public $atEnd = true;
	// find blog posts that match the provided blogFilter object
	function __construct($filter = null) {
		// set default filter if not provided
		if (is_null($filter)) $filter = new BlogFilter;
		$count = 0;
		foreach (scandir(POSTS_PATH, SCANDIR_SORT_DESCENDING) as $fileName) {
			// create blogPost object for each post and check against $filter
			if (preg_match(POST_REGEX, $fileName)) {
				$post = new BlogPost($fileName);
				if ($post->matchFilter($filter)) {
					// check if the matched post appears in the correct filter group
					if ($count >= $filter->group * $filter->limit) {
						// add post to blogList object
						if (count($this->list) < $filter->limit)
							$this->list[] = $post;
						// set atEnd property to false if limit + 1 posts can be matched
						else {
							$this->atEnd = false;
							break;
						}
					}
				}
				$count ++;
			}
		}
	}
}

class BlogFilter {
	function __construct() {
		$this->grouping();
		$this->matching();
	}

	public function grouping($limit = 10, $group = 0) {
		$this->limit = $limit;
		$this->group = $group;
	}

	public function matching($match = null, $field = null, $strict = false) {
		$this->match = $match;
		$this->field = $field;
		$this->strict = $strict;
	}
}

class CategoryList {
	public $list = [];
	function __construct() {
		$this->list = json_decode(file_get_contents(POSTS_PATH . "/categories.json"), true);
		usort($this->list, "categoryList::compare");
	}

	private static function compare($a, $b) {
		return strcmp($a["name"], $b["name"]);
	}
}