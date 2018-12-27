'use strict';

import PopupBootstrap from './PopupBootstrap';

class PopupConfirm extends PopupBootstrap {
    constructor() {
        super($('#popup-confirm'));
    }
}

module.exports = PopupConfirm;
