import * as Instafeed from 'instafeed.js'
import Dotdotdot from 'dotdotdot-js'

// Populate Instagram feed with images
const buildInstagramFeed = () => {
  const target = document.getElementById('instafeed')

  if (target) {
    const feed = new Instafeed({
      target: 'instafeed',
      get: 'user',
      userId: 'self',
      accessToken: process.env.INSTAGRAM_TOKEN,
      resolution: 'low_resolution',
      limit: 11,
      template: '<div class="grid-item" tabindex="0"><img class="grid-image" src="{{image}}" alt=""/><div class="grid-overlay"><a class="image-caption" href="{{link}}">{{caption}}</a><div class="image-stats"><span class="image-likes" data-count="{{likes}}">{{likes}}</span> <span class="image-comments" data-count="{{comments}}">{{comments}}</span></div></div></div>',
      after: () => {
        // Truncate image descriptions with ellipses
        target.querySelectorAll('.image-caption').forEach((elem) => {
          new Dotdotdot(elem)
        })
      },
    });

    feed.run();
  }
}

buildInstagramFeed()
