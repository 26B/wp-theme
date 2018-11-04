import hasFlag from 'has-flag';

const host = '[theme_slug].test';
const src = './src';
const dest = './public';
const test = './test';
const languages = './languages';
const debug = hasFlag('debug');

export default {
  src,
  dest,
  environment: {
    debug
  },
  sass: {
    src: `${src}/styles/**/*.{sass,scss}`,
    dest: './',
    settings: {
      sourceComments: debug ? 'map' : null,
      imagePath: `${dest}/images`,
      includePaths: []
    }
  },
  autoprefixer: {
    browsers: ['last 2 versions']
  },
  fonts: {
    src: `${src}/fonts/**/*.{ttf,woff,woff2}`,
    out: 'fonts.css',
    dest
  },
  i18n: {
    src: [
      '**/*.php',
      '!languages/',
      '!gulp/',
      '!src/',
      '!public/',
      '!vendor/',
      '!node_modules',
      'build/',
      'svn/'
    ],
    dest: languages,
    author: '[author_name]',
    support: '[author_url]',
    pluginSlug: '[theme_slug]',
    textDomain: '[text_domain]',
    potFilename: '[theme_slug]'
  },
  images: {
    src: `${src}/images/**`,
    dest: `${dest}/images`,
    settings: {
      svgoPlugins: [
        {
          cleanupIDs: false
        },
        {
          removeUnknownsAndDefaults: {
            SVGid: false
          }
        }
      ]
    }
  },
  svgSprite: {
    src: `${src}/svg-sprite/**.*svg`,
    dest: `${dest}/images`,
    config: {
      svg: {
        rootAttributes: {
          height: 0,
          width: 0,
          style: 'position: absolute'
        },
        transform: ['svgo']
      },
      mode: {
        symbol: {
          dest: '',
          sprite: 'sprite.svg'
        }
      }
    }
  },
  eslint: {
    src: `${src}/scripts/**/*.{js,jsx}`
  },
  browserSync: {
    proxy: host,
    files: ['*.css', '**/*.php', `${dest}/**`, '!**/*.map']
  },
  browserify: {
    debug,
    extensions: ['.jsx', '.yaml', '.json', '.hbs', '.dust'],
    bundleConfigs: [
      {
        entries: `${src}/scripts/app.js`,
        dest,
        outputName: 'app.js',
        vendor: false
      },
      {
        dest,
        outputName: 'infrastructure.js',
        vendor: true
      },
      {
        entries: `${src}/scripts/head.js`,
        dest,
        outputName: 'head.js'
      },
      {
        entries: `${src}/scripts/inline.js`,
        dest,
        outputName: 'inline.js'
      }
    ]
  }
};
