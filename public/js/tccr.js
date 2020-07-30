var TCCR = {};

TCCR.Main = function() {
    var self = this;

    this.API_ENDPOINT = '/tccr/public/';

    this.links = {};
    this.modules = {};
    this.data = {}; // read by all modules

    this.api = function(url) {
        return this.API_ENDPOINT + url;
    };

    this.load = function(module, prop) {
        if(!prop) {
            throw Error('Invalid module name: ' + prop);
        }

        module.main = this;
        this.modules[prop] = module;
    };

    this.loadModules = function() {
        var id;
        var module;

        for(id in this.modules) {
            module = this.modules[id];

            if(!module.init) {
                continue;
            }

            module.init();
        }
    };

    this.hidrate = function() {
        var self = this;

        $('a[data-onclick]').each(function() {
            var command = $(this).data('onclick');

            if(!command) {
                return;
            }

            // command is formatted as "verb:endpoint:id"
            var parts = command.split(':');

            if(parts.length != 3) {
                throw 'Invalid data-onclick on link: it should be "verb:endpoint:id".';
            }

            if(self.links[command]) {
                // Link is already hidrated.
                return;
            }

            $(this).click(command, function(event) {
                self.handleHidratedLinkClick(event);
            });
            self.links[command] = true;

            console.debug('[TCCR.Main] link hidrated: ' + command);
        });
    };

    this.onEndpointError = function(error) {
        // Handle error (https://stackoverflow.com/a/55079885/29827)
        if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.log(error.response.data.message);
            console.log(error.response.data.errors);
            // console.log(error.response.status);
            // console.log(error.response.headers);
        } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            console.log(error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
        }

        console.log(error.config);
    };

    this.removeEntryViaEndpointId = function(endpoint, id) {
        var domId = endpoint + '' + id;
        var el = document.getElementById(domId);

        if(el) {
            $(el).fadeOut('fast', function() {
                el.remove();
            });
        }
    };

    this.handleHidratedLinkClick = function(event) {
        var parts = event.data.split(':'); // command is "verb:endpoint:id"
        var verb = parts[0];
        var endpoint = parts[1];
        var id = parts[2];
        
        if(verb == 'delete') {
            var url = this.api(endpoint + '/' + id);
            
            this.removeEntryViaEndpointId(endpoint, id);

            axios.delete(url).then(function(response) {
                if(response.status == 200) {
                    // TODO: issue a message?  
                    console.debug(response);  
                }
            }).catch(this.onEndpointErrorfunction);    
        }
    };

    this.boot = function() {
        this.loadModules();

        // Integrate Laravel's CSRF token into all axios calls.
        window.axios.defaults.headers.common = {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };

        this.hidrate();
    };
};

TCCR.app = new TCCR.Main();

$(function() {
    TCCR.app.boot();
});