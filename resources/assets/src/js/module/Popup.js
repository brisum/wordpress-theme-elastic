'use strict';

import PopupBootstrap from './PopupBootstrap';

class Popup extends PopupBootstrap {
    constructor() {
        super($('#popup'));
    }
}

module.exports = Popup;
