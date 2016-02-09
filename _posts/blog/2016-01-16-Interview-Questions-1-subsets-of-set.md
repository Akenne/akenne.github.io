---
layout: post
title: Interview Question 1 - Getting subsets of a set
description: figuring out how to find all the subsets of a set
category: blog
disqus: y
---

This is a common interview question at the University of Waterloo, when you go through the jobmine process and get an interview with a big tech company, you may be asked something like:

> Given a set of elements n, find all subsets

Which means, if I give you [1, 2, 3], you give me [[], [1], [2], [3], [1, 2], [1, 3], [2, 3], [1, 2, 3]]

--- 

I am using python3 to solve this problem.

The idea is that there are 2^n subsets to a set of n elements. Often in an interview when you see something that is 2^n, it can be thought of as a binary problem. 

*(there are other solutions to this, this is just what I thought of)*

So if there are 2^n subsets, then you can use binary to represent each subset. for example: if you have [1,2], the subsets are [], [1], [2], [1,2]. these can be represented in binary as 00, 10, 01, 11.

So what we will do is loop through all the numbers 0..2^n-1, and convert them to binary, then display the elements as expected.

First we need a way to convert from decimal to binary:

```python
def binary(n):
    if n == 0:
        return ''
    else:
		# "//" is the truncating divison operator	
        return binary(n // 2) + str(n % 2)
```

*(you could also just do bin(n)... but usually you have to write these things yourself in interviews, and you might get asked how to do this anyway)*

Now that we have that we can apply our ideas

```python
def subset(s):
    subsets = []
    for i in range(2**len(s)):
        sub = []
        b = binary(i)
        # transform the binary from 101 to 00101
        b = '0'*(len(s) - len(b)) + b
        # map each 1 to it's set representation
        for i in range(len(s)):
            if b[i] == "1":
                sub.append(s[i])

        subsets.append(sub)
    return subsets

s = [1, 2, 3]
# prints [[3], [2], [2, 3], [1], [1, 3], [1, 2], [1, 2, 3]]
print(subset(s))
```

Remember, the key to technical questions is showing, not how quick you can solve it in the most efficient way, but showing your thinking, and solving it how the interviewer wants. I've have many people tell me they gave a "technically correct" solution, but to have the interviewer be disappointed by it. If you are just writing it from memory, you are avoiding the purpose of the question.
