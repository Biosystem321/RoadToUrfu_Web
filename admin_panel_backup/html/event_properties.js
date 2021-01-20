ymaps.ready(init);
var myMap;

function init () {
    myMap = new ymaps.Map("map", {
        center: [56.84241439059598, 60.640761668395065], // Ekb
        zoom: 11
    }, {
        balloonMaxWidth: 200,
        searchControlProvider: 'yandex#search'
    });

    /**
     * Processing events that occur when the user
     * left-clicks anywhere on the map.
     * When such an event occurs, we open the balloon.
     */
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coords');
            myMap.balloon.open(coords, {
                contentHeader:'Event!',
                contentBody:'<p>Click coordinates: ' + [
                    coords[0].toPrecision(10),
                    coords[1].toPrecision(10)
                    ].join(', ') + '</p>',
                contentFooter:'<sup>Click again</sup>'
            });
            document.getElementById("latitude").value = coords[0];
            document.getElementById("longitude").value = coords[1];
        }
        else {
            myMap.balloon.close();
        }
    });

    /**
     * Processing events that occur when the user
     * right-clicks anywhere on the map.
     * When such an event occurs, we display a popup hint
     * at the point of click.
     */
    myMap.events.add('contextmenu', function (e) {
        myMap.hint.open(e.get('coords'), 'Someone right-clicked');
    });
    
    // Hiding the hint when opening the balloon.
    myMap.events.add('balloonopen', function (e) {
        myMap.hint.close();
    });
}