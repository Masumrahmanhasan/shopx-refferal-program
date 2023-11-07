


/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {

}

import './components/util.js'
import './components/menu.js'
import './components/blockui.js'
import './components/cookie.js'
import './components/image-input.js'

import './components/toggle.js'
import './components/event-handler.js'
import './components/drawer.js'
import './components/dialer.js'
import './components/scroll.js'
import './components/scrolltop.js'
import './components/sticky.js'

import './layout/app.js'
import './layout/aside.js'

// import './custom/authentication/sign-in/general.js'




