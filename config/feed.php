<?php

return [
    'feeds' => [
        'news' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/article.rss',

            'title' => 'The Upcoming News on santonamedia.com',
            'language' => 'en-US',

            /*
             * The view that will render the feed.
             */
            'view' => 'user.posts.index',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],

        'main' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => '',

            /*
             * The feed will be available on this url.
             */
            'url' => '',

            'title' => 'My feed',
            'description' => 'The description of the feed.',
            'language' => 'en-US',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::atom',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],
    ],
];
