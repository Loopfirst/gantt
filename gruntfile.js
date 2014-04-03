'use strict';


var children = [];
var standardio = ['pipe', process.stdout, process.stderr];


function spawnFailed(error, result, code) {
    if (error !== null) {
        console.log('child process died');

        children.forEach(function(child) {
            console.log('killing child: ' + child.name + '(' + child.process.pid + ')');
            child.process.kill();
        });

        process.exit(2);
    }
}



module.exports = function(grunt) {
    // Loads all grunt maintained packages
    require('matchdep').filterDev('grunt-contrib*').forEach(grunt.loadNpmTasks);
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks); // loads grunt packages

    grunt.initConfig({
        compass: {
            dist: {
                options: {
                    config: 'config.rb',
                    force: true,
                    environment: "development"
                }
            },
            clean: {
                options: {
                    clean: true
                }
            },
            watch: {
                options: {
                    config: 'config.rb',
                    force: true,
                    environment: 'development',
                    watch: true,
                    // sourcemap: true
                }
            }
        },


        watch: {
            files: {
                files: ['styles/css/**', 'index.php', 'data/**', 'js/**', 'lib/**'],
                options: {
                    livereload: true
                }
            }
        },


        concurrent: {
            watchers: {
                tasks: ['php', 'compass:watch', 'watch'],
                options: {
                    logConcurrentOutput: true
                }
            }
        }
    });


    var execute = {
        php: {
            cmd: 'php',
            args: ['-S', 'localhost:1234'],
            opts: {
                stdio: standardio
            }
        }
    }


    /*=================================================================================
    register tasks
    =================================================================================== */

    grunt.registerTask("php", "php server", function() {
        //this task is blocking!
        children.push({
            name: 'php',
            process: grunt.util.spawn(execute.php, spawnFailed)
        });
    });


    grunt.registerTask('server', 'serve');
    grunt.registerTask('serve', 'Starts watchers', ['concurrent:watchers']);


    // By default, lint and run all tests.
    grunt.registerTask('default', 'Show options', function() {
        grunt.log.writeln('\n\nRun grunt with following options:');
        grunt.log.writeln('=================================');
        grunt.log.writeln('   serve     start watch and serve static files');
    });
};
