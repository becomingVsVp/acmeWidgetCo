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


#REVIEW#

###List of setup items completed:###

* set up aws account
* verify php
* configure CodeCommit
* set up IAM user
* add ssh to IAM user and test
* git clone into local drive
* open up phpStorm project
* create test class
* setup composer and test classes autoload
* verify php Unit Testing is set up
* add phpunit test on test class
* verify local browser test works
* verify querystring / $_GET is working locally
* commit to codecommit
* configure elastic beanstalk
* config CodePipeline
* test live url browser
* verify querystring / $_GET is working
* branch git (dev)
* configure dev elastic beanstalk
* config CodePipeline
* change index file
* commit branch
* verify build & confirm live url
* commit branch to main
* verify build & confirm live url
>>>2:48 time expired
* describe Acme Widget Co Project in gliffy?
* reread project spec to verify understanding
* define querystring variables
>>>3:34 time expired
* **DATA MODEL COMPLETE**
* created partial basket class
* created and tested widget class
* create classes
* create tests
>>>7:50 time expired
* complete the basket class
* complete testing
>>>9:15 time expired
* create script
* create urls that should test the given products
* verify that project spec is complete
* look at additional request from Lincoln in email
>>>9:33 time expired
* keep shipping from calculating if now products
* create readme 
* create a public sharable account on github and push repo over
>>>10:31 time expired
>>>PROJECT COMPLETED

###List of items todo:###
* talk with Patrick about my $$$$ ;)


