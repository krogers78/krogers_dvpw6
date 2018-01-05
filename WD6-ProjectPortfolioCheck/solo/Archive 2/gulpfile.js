const gulp = require('gulp')
const sass = require('gulp-sass')

gulp.task('scss', () => {
  gulp.src('scss/*.scss')
    .pipe(sass())
    .pipe(gulp.dest('myframework/assets/css/'))
})

gulp.task('default', ['scss'], () => {
  gulp.watch('./scss/**/*.scss', ['scss'])
})