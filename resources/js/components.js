import {defineAsyncComponent} from "vue";

const globalComponents = {
    ProjectTable: defineAsyncComponent(() => import('./components/ProjectTable')),
}

export const registerComponents = (app) => {
    for (let c in (globalComponents)) {
        app.component(c, globalComponents[c]);
    }
}
