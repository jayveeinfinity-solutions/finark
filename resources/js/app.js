import '../sass/app.scss';
import 'bootstrap';

import { createInertiaApp, Head, Link } from '@inertiajs/vue3';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import LandingLayout from '@shared/Layouts/Landing.vue';
import CorporateUILayout from '@shared/Layouts/CorporateUI.vue';

// Region Fontawesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faRightToBracket, faAngleLeft, faAngleRight, faLocationDot, faMoneyBillWave, faBriefcase, faMoneyBillTrendUp, faUniversalAccess, faPersonCane, faHandsHoldingChild, faHouseChimney, faFileInvoice, faHeart, faChartColumn, faArrowTrendUp, faCity, faPeopleGroup, faGlobe, faCaretLeft, faCaretRight, faBars, faBarsStaggered, faGauge, faUsers, faCog, faHandshake, faAnglesRight, faBell, faCalendarCheck, faNewspaper, faUserTie, faCalendarDays, faSitemap, faPiggyBank, faSackDollar, faEye, faCheck, faBan, faPlus, faEdit, faEnvelope, faMessage, faArrowLeftLong, faUserPlus, faIdBadge, faKey, faClipboardCheck, faFilm, faInfoCircle, faIdCard, faSignOutAlt, faUserFriends, faClock, faUserCheck, faUserTimes, faCalendar, faPlayCircle, faLongArrowAltLeft, faLongArrowAltRight, faComments, faBullseye, faHandsHelping, faQuestionCircle, faUpload, faCheckCircle, faVideo, faChevronDown, faTimes, faCoffee, faBullhorn, faFistRaised } from '@fortawesome/free-solid-svg-icons';
import { faWhatsappSquare, faFacebook, faInstagramSquare, faSquareYoutube, faLinkedin, faWhatsapp, faSquareFacebook, faYoutube } from '@fortawesome/free-brands-svg-icons';

library.add(faRightToBracket, faAngleLeft, faAngleRight, faLocationDot, faMoneyBillWave, faBriefcase, faMoneyBillTrendUp, faUniversalAccess, faPersonCane, faHandsHoldingChild, faHouseChimney, faFileInvoice, faWhatsappSquare, faFacebook, faInstagramSquare, faSquareYoutube, faLinkedin , faHeart, faArrowTrendUp, faChartColumn, faCity, faPeopleGroup, faGlobe, faCaretLeft, faCaretRight, faBars, faBarsStaggered, faGauge, faUsers, faCog, faHandshake, faAnglesRight, faBell, faCalendarCheck, faNewspaper, faUserTie, faCalendarDays, faSitemap, faSackDollar, faPiggyBank, faEye, faCheck, faBan, faPlus, faEdit, faEnvelope, faWhatsapp, faMessage, faArrowLeftLong, faUserPlus, faIdBadge, faKey, faClipboardCheck, faFilm, faInfoCircle, faIdCard, faSignOutAlt, faUserFriends, faClock, faUserCheck, faUserTimes, faCalendar, faPlayCircle, faLongArrowAltLeft, faLongArrowAltRight, faComments, faBullseye, faHandsHelping, faQuestionCircle, faUpload, faCheckCircle, faVideo, faBars, faEye, faChevronDown, faTimes, faLocationDot, faSquareFacebook, faYoutube, faCoffee, faBullhorn, faFistRaised);
// End Region

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        // Import all pages eagerly
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });

        // Resolve the page based on its name
        const page = pages[`./Pages/${name}.vue`];

        console.log(page)

        // Throw an error if the page does not exist
        if (!page) {
            throw new Error(`Page "./Pages/${name}.vue" not found.`);
        }

        // Assign a layout dynamically
        if (name.startsWith("Admin/")) {
            page.default.layout ??= CorporateUILayout;
        } else {
            page.default.layout ??= LandingLayout;
        }

        return page.default;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(VueSweetalert2)
            .component("Link", Link)
            .component("Head", Head)
            .component('FontAwesomeIcon', FontAwesomeIcon)
            .mount(el);
    },
    title: title => `${title} FinArk Official Website`,
    progress: {
        color: '#4B5563',
    },
});
