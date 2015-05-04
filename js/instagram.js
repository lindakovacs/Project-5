var feed = new Instafeed({
        get: 'tagged',
        tagName: 'weareimd',
        clientId: '3d9cc394914541c79766e28cc7ab95cc',
        
        filter: function(image) {
            var blockedUsernames = [
                'imtoofabluv'
            ];

            // check for blocked users
            for (var i=0; i<blockedUsernames.length; i++) {
                if (image.user.username === blockedUsernames[i]) {
                  return false;
                }
            }

            return true;
        }
    });
    feed.run();