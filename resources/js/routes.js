import baseLayouts from "./views/admin/baseLayouts";
import dashboard from "./views/admin/dashboard";
import home from "./views/admin/home";
import userList from "./views/admin/user/index";
import productManage from "./views/admin/product/index";

const routes = [{
    path: '/admin',
    component: baseLayouts,
    children: [{
            path: 'dashboard',
            component: dashboard,
            meta: { pageTitle: 'Dashboard' }
        },
        {

            path: 'home',
            component: home,
            meta: { pageTitle: 'Home' }
        },
        {
            path: 'user',
            component: userList,
            meta: { dataUrl: 'api/user', pageTitle: 'Users' }
        },
        {
            path: 'product',
            component: productManage,
            meta: { dataUrl: 'api/product', pageTitle: 'Products' }
        }
    ]
}];

export default routes;