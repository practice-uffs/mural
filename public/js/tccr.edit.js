/**
 * 
 */
TCCR.Edit = function() {
    this.autocompletes = {};

    this.getUserParticipationHtml = function(endpoint, id, user) {
        return '' +
            '<div class="row align-items-center" id="' + endpoint + id + '">' + 
                '<div class="col-2">' + 
                    '<img alt="image" class="user-avatar rounded-circle" src="https://colorlib.com/polygon/sufee/images/admin.jpg">' + 
                '</div>' + 
                '<div class="col-9">' + 
                    '<p>' + 
                        user.name + ' <br/>' + 
                        '<small class="text-muted">' + user.username + '</small><br />' + 
                        '<span class="badge badge-danger">Não confirmado</span>' + 
                    '</p>' + 
                '</div>' + 
                '<div class="col-1">' + 
                    '<a href="javascript:void(0);" data-onclick="delete:participation:' + id + '">R</a>' + 
                '</div>' + 
            '</div>';
    };

    this.onAutoCompleteClicked = function(containerId, user, el) {
        var self = this;
        var pageData = this.main.data.edit;
  
        var data = {
            username: user.username,
            project_id: pageData.project.id,
            role: 4 // TODO: get this from main.data.edit
        };

        // TODO: add loading indication

        axios.post(this.main.api('participation/add'), data, {
            headers: {'Accept': 'application/json'}
        })
        .then(function(response) {
            console.debug(response);
            
            if(response.status != 200) {
                // TODO: show an alert?
                return;
            }
            
            var entry = document.createElement('div');
            entry.innerHTML = self.getUserParticipationHtml('participation', response.data.participation.id, user);

            document.getElementById(containerId).prepend(entry);
            self.main.hidrate();
        })
        .catch(this.main.onEndpointError);
    };
    
    this.getOrCreateAutoComplete = function(containerId, inputId, suggestionsContainerId) {
        var ac = this.autocompletes[containerId];

        if(ac) {
            return ac;
        }

        ac = new IDUFFS.AutoComplete();
        
        ac.init({
            group: 'computacao.ch',
            maxSuggestions: 30,
            suggestionsContainerId: suggestionsContainerId,
            inputId: inputId,
            
        }).done(function(data) {
            console.log('Autocomplete está pronto. Elementos no indice: ' + data.length);
            
        }).fail(function(error) {
            console.log('Falha ao inicializar autocomplete: ', error);
        });

        this.autocompletes[containerId] = ac;
        return ac;
    };

    this.createUserSelection = function(containerId, inputId, suggestionsContainerId) {
        var self = this;
        var ac = this.getOrCreateAutoComplete(containerId, inputId, suggestionsContainerId);

        ac.signals.clicked.add(function(user, el) {
            self.onAutoCompleteClicked(containerId, user, el);
        });  
    };

    this.init = function() {
        console.debug('TCC.Edit.init', this.main.data.edit);
        this.createUserSelection('examiners', 'examiner', 'examiner-suggestions');
    };
};

TCCR.app.load(new TCCR.Edit(), 'edit');