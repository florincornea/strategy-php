# strategy pattern - php

Strategy design pattern with php example

"In computer programming, the strategy pattern (also known as the policy pattern) is a behavioral software design pattern that enables selecting an algorithm at runtime. Instead of implementing a single algorithm directly, code receives run-time instructions as to which in a family of algorithms to use." - wikipedia

Utilizarea acestui pattern este recomandata in cazul in care dorim sa schimbam diferite functionalitati la runtime;

In exemplul de aici avem 2 moduri de a calatori, cu masina sau barca si dorim sa cunoastem costul si consumul pt distanta parcursa.
Pentru a nu utiliza "if"-uri si a beneficia de avantajele POO, am creat o interfata pentru Strategy din care vom implementa 2 clase concrete in care facem caluculele specifice pt fiecare tip de calatorie.