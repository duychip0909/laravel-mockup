import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
import Toaster from '../../vendor/masmerise/livewire-toaster/resources/js';

Alpine.plugin(Toaster);

Alpine.start();

import 'flowbite';
