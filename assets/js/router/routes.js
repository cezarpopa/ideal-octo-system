import Jobs from "../views/Open/Jobs";
import NewJob from "../views/Open/NewJob";
import Properties from "../views/Open/Properties";
import PageNotFound from "../views/Open/PageNotFound";

export const routes  = [
  {
    path: '/',
    name: 'Home',
    component: Jobs,
  },
  {
    path: '/new-request',
    name: 'NewJob',
    component: NewJob,
  },
  {
    path: '/properties',
    name: 'Properties',
    component: Properties,
  },
  {
    path: '/:catchAll(.*)*',
    name: "PageNotFound",
    component: PageNotFound,
  },
];
