Installation

Using Composer :

composer install
If you don't have composer, you can get it from https://getcomposer.org

Run the application

Note that the source file used for this application is located in "src/Repositories/tripsorter.php" path. You can re-sort the array as you want or use your own array.

I accepted that the start and finish points are stored in an array and picked randomly.
The stops between the start and finish are stated in the same way.
The trip sorter (generator) executes the algorithm to find a route between the start and finish.
The trip starts from the start point. The next trip's start point is the first trip's finish point.
This must be the same for every trip till the end.
I wrote the code in cloud9 environment and I used composer for package management in this development process.
In order to use composer, I added composer.json file into the application's path.