import 'jquery'

import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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

import './custom/authentication/sign-in/general.js'


