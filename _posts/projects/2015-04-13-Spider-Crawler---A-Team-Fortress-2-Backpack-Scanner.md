---
layout: post
title: Spider Crawler - A different kind of backpack scanner
description: A item scanner for the game Team Fortress 2
category: projects
disqus: y
---

###What?###
This is the biggest project I have ever made, and is written in Python. To a random observer it might seem very confusing. The very simplified goal, is to find
people who play Team Fortress 2, and have items that are worth a lot of money. I used to be very involved in this games economy, and some
items can sell for thousands of USD. The concept of it is that it scans peoples inventories, and then their friends inventories, and then their
friends inventories, etc. This way there is an endless supply of people to scan. The idea of a scanner has been around for a long time, but what
they would do is have you go onto a server hosting a game (with <30 people), scan the people on the server, and then change servers and repeat.
This is extremely time consuming, if you were quick you could scan maybe 20 people a minute. Mine does not require you to join a server (or even
own the game for that matter), and scans about 3000 users a minute, more or less depending on your computer speed. In the right hands this program
can make someone a lot of money, and I have had people donate to me due to their success with it. When I released it for free, it got around 400 downloads.

###How?###
The initial program would just scan the user, see if they have the item you are looking for, and if so, add them to a text file. It evolved to include
many many settings, such as how many threads you want to use, what items to look for, if the items have been traded, if the player owns the game,
if the item is untradable, if the user is online, the last time the user was online, and how many hours the user has played.

What is being used to get the majority of this data is the steam api, which gives a lot of data in the JSON format. If the data matches all the
options the user has checked, then the players info will be output(his id). Now this was nice, but eventually I decided to give it a GUI, and this
was the first gui I ever made. I developed it using tkinter. Initially it looked like complete and utter garbage. Then I discovered how grids worked,
and then frames, and suddenly it wasn't looking half bad. I got any users that fit the criteria to be put on a graph, which included their name, id,
items that you wanted and they had, and hours played. The user can then click the player on the graph and then go to their steam page, or backpack page
 (with different backpack options).
 
It was also initially a lot slower, but I figured out that I could make use of multithreading, and the users/minute went from 100 to 3000. The program stores
a list of everyones friends(to a limit of 200), and each thread handles searching of these players, and then takes on a new player when done. The list of friends
is topped up if it goes below 100.
 
Any data is also saved for future use (who you have scanned before, who met your criteria), and is saved via the pickle module. This keeps it in a nice array format.

My biggest struggles with this project were understanding how JSON worked, figuring out multithreading, and GUI design. After many hours I am now proud to say I
 understand these concepts a whole lot better. It was very rewarding to have people actually using something I made myself. And to have them donate to me and thank
 me for the work I did was just amazing.