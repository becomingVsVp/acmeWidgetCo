# Acme Widget Co Project

by Brian Becker

## Execution ##
If run on a command line the products default to "B01,G01" 

If run on localhost or against the live version of the code, the format is comma delimited:

Products=PROD1,PROD2,...,PROD3

For example:

* [dev.testingforvp.link/index.php?Products=B01,G01](http://dev.testingforvp.link/index.php?Products=B01,G01)
* [dev.testingforvp.link/index.php?Products=R01,R01](http://dev.testingforvp.link/index.php?Products=R01,R01)
* [dev.testingforvp.link/index.php?Products=R01,G01](http://dev.testingforvp.link/index.php?Products=R01,G01)
* [dev.testingforvp.link/index.php?Products=B01,B01,R01,R01,R01](http://dev.testingforvp.link/index.php?Products=B01,B01,R01,R01,R01)

## Decisions Regarding Backend Deployment ##
Used AWS Services to create CI/CD pipeline: 
* CodeCommit for git repository
* CodePipeline to deploy to server
* Elastic Beanstalk for Server Environments

Created two different environments:
* [dev.testingforvp.link](http://dev.testingforvp.link) -- dev environment and fully committed code running on dev branch
* [www.testingforvp.link](http://www.testingforvp.link) -- production environment with a coming soon running on main branch


## Decisions Regarding Project ##

All products are stored in a mock gateway rather than in a database.

All monies are stored as cents for accuracy.

Codebase (other than the gateway class) has 100% test coverage using phpUnit.

## Final Commit --> Pull Request ##

When you are ready, I'll finalize the www commit by doing a pull request from dev to main branch 
and the service will be live at www.testingforvp.link and the following will work
* [Products=B01,G01](http://www.testingforvp.link/index.php?Products=B01,G01)
* [Products=R01,R01](http://www.testingforvp.link/index.php?Products=R01,R01)
* [Products=R01,G01](http://www.testingforvp.link/index.php?Products=R01,G01)
* [Products=B01,B01,R01,R01,R01](http://www.testingforvp.link/index.php?Products=B01,B01,R01,R01,R01)

## Final Thoughts ##
I'm looking forward to coming on board with your company. :)



