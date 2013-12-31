module.exports = function(grunt) {
	'use strict';

	grunt.initConfig({
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'js/src/scripts.js'
			]
		},
		sass: {
			development: {
				options: {
					//style: 'expanded'
				},
				files: {
					'css/styles.dev.css': 'css/src/styles.scss',
					'css/login-styles.dev.css': 'css/src/login-styles.scss'
				}
			},
			production: {
				options: {
					style: 'compressed'
				},
				files: {
					'css/styles.min.css': 'css/src/styles.scss',
					'css/login-styles.min.css': 'css/src/login-styles.scss'
				}
			}
		},
		uglify: {
			development: {
				options: {
					mangle: false,
					compress: false,
					beautify: true
				},
				files: {
					'js/scripts.dev.js': [
						'js/src/scripts.js'
						]
				}
			},
			production: {
				options: {
					compress: {
						global_defs: {
							'DEBUG': false
						},
						dead_code: true
					}
				},
				files: {
					'js/scripts.min.js': [
						'js/src/scripts.js'
					]
				}
			}
		},

		watch: {
			sass: {
				options: {
					spawn: false
				},
				files: [
				'css/src/styles.scss',
				'css/src/login-styles.scss'
				],
				tasks: ['sass:development']
			},
			js: {
				files: [
				'js/src/**/*.js'
				],
				tasks: ['jshint', 'uglify:development']
			}
		},
		clean: {
			dist: [
			'css/styles.min.css',
			'css/login-styles.min.css',
			'js/scripts.min.js'
			]
		}
	});

	// Load tasks
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	
	// Register tasks
	grunt.registerTask('default', [
		'jshint',
		'clean',
		'uglify:production',
		'sass:production'
		]);
	
	grunt.registerTask('prod', [
		'jshint',
		'clean',
		'uglify:production',
		'sass:production'
	]);

	grunt.registerTask('dev', [
		'watch'
		]);

};