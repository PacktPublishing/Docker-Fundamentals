import os

print("Hello World. I am Python")

if "a" in os.environ and "b" in os.environ:
	firstnum = os.environ['a']
	secondnum = os.environ['b']
	sum = int(firstnum) + int(secondnum)
	print('Sum of {0} & {1} is {2}'.format(firstnum,secondnum,sum))
else:
	print('No parameters passed to calculate the sum.')

print("Python Bye!")
