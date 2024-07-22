require('./bootstrap');

import 'flowbite';

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './Layouts/Authenticated.vue';

const appName =
    window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default;

        if (page.layout === undefined) {
            page.layout = Layout;
        }

        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({
    // delay: 250,
    color: '#e77c22',
    includeCSS: true,
    showSpinner: true,
});



console.log('File successfully loaded!');
console.log('We Power the Future, One Line of Code at a Time. ');
