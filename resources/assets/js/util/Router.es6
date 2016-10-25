import _ from 'lodash';

export default class Router {
    constructor(routes) {
        this.routes = Object.assign(...routes.map(d => ({ [d.constructor.name]: d })));
    }

    fire(route, fn = 'init', args = []) {
        const fire = route !== '' && this.routes[route]
            && typeof this.routes[route][fn] === 'function';

        if (fire) {
            this.routes[route][fn](...args);
        }
    }

    loadEvents() {
        // Fire common init JS
        this.fire('CommonController');

        // Fire page-specific init JS, and then finalize JS
        document.body.className
            .split(/\s+/g)
            .map(_.camelCase)
            .map(_.upperFirst)
            .map((v) => v.concat('Controller'))
            .forEach((className) => {
                console.log(className);
                this.fire(className);
                this.fire(className, 'finalize');
            });

        // Fire common finalize JS
        this.fire('CommonController', 'finalize');
    }
}
