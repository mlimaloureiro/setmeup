/*global setmeup, $*/

var serverURL = 'http://localhost:8000/';
var twitterEndPoint = serverURL + 'twitter/';
var facebookEndPoint = serverURL + 'facebook/';
var linkedInEndPoint = serverURL + 'linkedin/';
var pinterestEndPoint = serverURL + 'pinterest/';

window.setMeUp = {

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
        evt.preventDefault();
        var username = $('#username_input').val();
        console.log('checking availability');
        
        $.get(twitterEndPoint + 'username/availability/' + username, function(data) {
            if(data.exists) {
                console.log('twitter is not available');
            } else {
                console.log('twitter is available');
            }
        });

        $.get(facebookEndPoint + 'username/availability/' + username, function(data) {
            if(data.exists) {
                console.log('facebook is not available');
            } else {
                console.log('facebook not available');
            }
        });

        $.get(linkedInEndPoint + 'username/availability/' + username, function(data) {
            if(data.exists) {
                console.log('linkedin is not available');
            } else {
                console.log('linkedin is available');
            }
        });

    },
};

$(document).ready(function () {
    'use strict';
    setMeUp.init();
});
