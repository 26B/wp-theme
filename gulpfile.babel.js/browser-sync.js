import browserSync from 'browser-sync';
import config from './config';

const browserSyncTask = () => browserSync(config.browserSync);

export default browserSyncTask;
