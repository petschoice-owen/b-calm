'use strict';

const imagemin = require('gulp-imagemin');
const useref = require('gulp-useref');
const terser = require('gulp-terser');
const gulpIf = require('gulp-if');

module.exports = (gulp, path) => {
  const parallelTasks = ['build:image'];
  const seriesTasks = ['build:useref'];

  gulp.task('build:image', (done) => {
    return gulp
      .src(`${path.src}assets/images/**/*`)
      .pipe(
        imagemin([
          imagemin.svgo({
            plugins: [{removeViewBox: false}],
          }),
        ])
      )
      .pipe(gulp.dest(`${path.dist}assets/images/`));

    done();
  });

  gulp.task('build:useref', function () {
    return (
      gulp
        .src(`${path.src}*.html`)
        .pipe(useref())
        .pipe(gulpIf('*.js', terser()))
        .pipe(gulp.dest(`${path.dist}`))
    );
  });

  gulp.task(
    'build:compress',
    gulp.series(
      gulp.parallel(parallelTasks),
      seriesTasks,

      (done) => done()
    )
  );
};
