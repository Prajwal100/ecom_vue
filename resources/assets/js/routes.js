
const dashboard=require('./components/backend/dashboard.vue').default;

//Banner routes start here...

const banner=require('./components/backend/banner/index.vue').default;
const bannerCreate=require('./components/backend/banner/create.vue').default;
const bannerEdit=require('./components/backend/banner/edit.vue').default;

//Banner routes end here...
//Category routes start here...

const category=require('./components/backend/category/index.vue').default;
const categoryCreate=require('./components/backend/category/create.vue').default;
const categoryEdit=require('./components/backend/category/edit.vue').default;

//Category routes end here...

//Setting up Routes
export const routes=[
    {
        path:'/admin',
        component:dashboard,
    },
    //banner section

    {path:'/banner',component: banner,name:'banner'},
    {path:'/banner-create',component: bannerCreate,name:'banner-create'},
    {path:'/banner-edit/:id',component: bannerEdit,name:'banner-edit'},

    //category section
    {path:'/category',component: category,name:'category'},
    {path:'/category-create',component: categoryCreate,name:'category-create'},
    {path:'/category-edit/:id',component: categoryEdit,name: 'category-edit'},


]
//Registering routes
