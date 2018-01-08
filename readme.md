# Brown College Moovie Loan System
### A re-creation of the original, horrible, awesome, amazing PHP version
![Alt text](crappy_original_php_version_from_2003/how.jpg?raw=true "the cow let people know we were serious")

A long time ago, in a galaxy far, far away...

Netflix didn't exist yet<sup id="a1">[1](#f1)</sup>. Youtube didn't exist yet. Digital movie files were limited to a maximum of 320px resolution and took two days to download, even on our fast university-sponsored pipe. We were still spending our money on DVDs--or, in some cases, VHS cassettes. But in our residential college, surely SOMEBODY had a movie worth watching...

And so my roommate Shane and I conceived of a system. By today's standards, it was horrible. We didn't know what frameworks were. Our source control was a pretty-pirated copy of Macromedia's Dreamweaver. Our sole reference was my well-thumbed copy of "SAM's LEARN PHP IN 24 HOURS" (I still recommend this book to anyone who is learning PHP for some reason). Shane was a CS minor; I was a kid who didn't know any better. I think that we were aware of the shoestring nature of our project even at the time, making the consiously bad design choices to ensure that anyone who saw it knew from the top that they were laughing with us, not at us. The background was purple; the text green; the links yellow. The pallet was even more gross when we tested it back and forth between his Mac and my PC and their at-the-time-even-more-divergent gamma settings.

We benefited tremendously from an extremely tolerant user base. This was before most people had discovered Google; I'm not sure if Facebook (then only accessible via "thefacebook.com") had come to our school yet. We asked each user to not only register, but also to manually enter information for each movie. We even had a field for the IMDB link to the movie in question, because I'm not sure that either of us knew what an API was at the time. You could check out somebody else's movie and your reward would be an email (sent to both of you) that contained the room number and name of the owner, so you could go pick up the tape. You could see who had which of your movies, and I think we even sorted by how long each of them had been checked out--there may have even been some kind of reminder email system.<sup id="a2">[2](#f2)</sup>

Anyways, I was going through some Django docs and decided I wanted to see how long it would take me to recreate this project nowadays. At the time I think it took about 2-3 weeks of part-time work. Now? I think I can do it in maybe an angry afternoon. I guess the commit logs will tell the tale!


----
<b id="f1">1</b>: OK it did, but not the streaming part, and college students couldn't afford it anyway.[↩](#a1)

<b id="f2">2</b>: Oh, lord, I forgot until now how much we depended on email. This was all hosted on university servers--I think that must have been how we were able to get emails out of our unsigned server. This was just before SMTP servers started not accepting anonymous connections and relay messages.[↩](#a2)
