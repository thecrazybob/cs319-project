require('./bootstrap');

import Alpine from 'alpinejs';
import ToastComponent from '../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import Focus from '@alpinejs/focus'

Alpine.data('ToastComponent', ToastComponent)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(Focus)

window.Alpine = Alpine;

Alpine.start();
