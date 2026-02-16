import './bootstrap';
import 'preline';
document.addEventListener('DOMContentLoaded', () => {
  window.HSStaticMethods.autoInit();
});
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
