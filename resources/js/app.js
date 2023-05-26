import { createApp, h } from "vue";
import { createInertiaApp , Link , Head} from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

import Layout from "./Shared/Layout.vue";
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        if (!page.default.layout) {
            page.default.layout = name.startsWith("Public/")
                ? undefined
                : Layout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link",Link)
            .component("Head",Head)
            .mount(el);
    },
    progress: true,
    title:(title)=> {
        return "My App - "+title;
    },
});
