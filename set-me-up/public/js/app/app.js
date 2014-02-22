/*global setmeup, $*/

var serverURL = 'http://localhost:8000/';
var twitterEndPoint = serverURL + 'twitter/';
var facebookEndPoint = serverURL + 'facebook/';
var linkedInEndPoint = serverURL + 'linkedin/';
var pinterestEndPoint = serverURL + 'pinterest/';

window.setMeUp = {

    resultAvailabilityDiv: $('.results-availability'),

    init: function () {
        'use strict';
        this.initEvents();
        console.log('Starting setmeup!');
    },

    initEvents: function() {
        // first step
        $('#submit_check_availability').on('click', this.checkAvailability);
    },

    checkAvailability: function(evt) {

        counter = 0;
        evt.preventDefault();
        var username = $('#username_input').val();
        console.log('checking availability');
        
        $('.facebook-positive').hide();
        $('.twitter-positive').hide();
        $('.linkedin-positive').hide();
        $('.facebook-negative').hide();
        $('.twitter-negative').hide();
        $('.linkedin-negative').hide();
        $('.facebook-checking').show();
        $('.twitter-checking').show();
        $('.linkedin-checking').show();

        $.get(twitterEndPoint + 'username/availability/' + username, function(data) {
            $('.twitter-checking').hide();

            if(data.exists) {
                $('.twitter-negative').show();
                console.log('twitter is not available');
            } else {
                $('.twitter-positive').show();
                console.log('twitter is available');
            }

        });

        $.get(facebookEndPoint + 'username/availability/' + username, function(data) {
            $('.facebook-checking').hide();

            if(data.exists) {
                $('.facebook-negative').show();
                console.log('facebook is not available');
            } else {
                $('.facebook-positive').show();
                console.log('facebook not available');
            }
        });

        $.get(linkedInEndPoint + 'username/availability/' + username, function(data) {
            $('.linkedin-checking').hide();

            if(data.exists) {
                $('.linkedin-negative').show();
                console.log('linkedin is not available');
            } else {
                $('.linkedin-positive').show();
                console.log('linkedin is available');
            }
        });
    },
};

$(document).ready(function () {
    'use strict';
    setMeUp.init();
});
