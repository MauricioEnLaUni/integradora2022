# Imports
from random import randint
from sys import stdout

# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = stdout

# Opens file to edit.
f = open("orders.txt","a")

for i in range(500):
    f.write("INSERT INTO ORDERS VALUES(\'OR0"+i+"\',"+str(randint(1,40))+",\'"+str(datetime.date(2010,1,1) + datetime.timedelta(days=random.randrange((datetime.date(2022,6,1) - datetime.date(2010,1,1)).days)))+"\',"+str(randint(1,27))+","+str(randint(1,15))+","+str(randint(1,200))+");\n")

# Restores stdout to the initial value, once again, I'm not sure this is necessary at all.
stdout = or_stdout