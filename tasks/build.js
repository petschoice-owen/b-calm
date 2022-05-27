const gulp = require('gulp');
const removehtml = require('gulp-remove-html');
const inject = require('gulp-inject-string');

const path = {
  baseUrl: '..',
  src: '../',
  dist: '../dist/',

  sass: {
    outputStyle: 'compressed',
    includePaths: [],
  },

  sources: {
    sass: [
      '../styles/main.scss',
    ],
  },
};

const parallelTask = ['build:css', 'build:fonts'];

require('./assets')(gulp, path);

gulp.task('build:css', (done) => {
  return gulp
    .src(`${path.src}styles/main.min.css`)
    .pipe(gulp.dest(`${path.dist}styles/`));

  done();
});

gulp.task('build:fonts', (done) => {
  return gulp
    .src(`${path.src}assets/fonts/**/*`)
    .pipe(gulp.dest(`${path.dist}assets/fonts/`));

  done();
});

require('./compress')(gulp, path);

gulp.task(
  'default',
  gulp.series(
    'assets',
    'build:compress',

    gulp.parallel(parallelTask),

    (done) => done()
  )
);
