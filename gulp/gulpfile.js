var gulp = require('gulp'); 
var less = require('gulp-less');
var concat = require('gulp-concat');
var csso = require('gulp-csso');
var watch = require('gulp-watch');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('less', function() {
	gulp.src(['../backend/web/less/main.less'])
		.pipe(less())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
		.pipe(csso())
		.pipe(gulp.dest('../backend/web/css/'));
});

gulp.task('less_front', function() {
    gulp.src(['../frontend/web/less/main.less'])
        .pipe(less())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(csso())
        .pipe(gulp.dest('../frontend/web/css/'));
});

gulp.task('watch_back', function() {
    // gulp.watch('src/**', function(event) {
    //     gulp.run('scripts');
    // })

    gulp.watch(['../backend/web/less/*.less', '../backend/web/less/*/*.css'], function(event) {
        gulp.run('less');
    })
});

gulp.task('watch_front', function() {
    // gulp.watch('src/**', function(event) {
    //     gulp.run('scripts');
    // })

    gulp.watch(['../frontend/web/less/*.less', '../frontend/web/less/*/*.css'], function(event) {
        gulp.run('less_front');
    })
});