from random import randint,sample
import numpy
from wonderwords import RandomWord
from sys import stdout
import names
from string import ascii_lowercase,ascii_uppercase,digits

def pgen():
    #define data
    lower = ascii_lowercase
    upper = ascii_uppercase
    num = digits
    #combine the data
    suma = lower + upper + num
    choices = numpy.random.choice([char for char in suma], size = 64, replace=True)
    # use random 
    # temp = sample(all,64)
    return "".join(choices)
    
# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = stdout

# Assigns alis to RandomWord
r = RandomWord()
# Opens file to edit.
f = open("usr.txt","a")
def dom(x):
    match(x):
        case 1|2|3:
            dom = "gmail.com"
        case 4|5|6:
            dom = "hotmail.com"
        case 7|8|9:
            dom = "yahoo.com"
        case 10:
            dom = r.word(include_parts_of_speech=["noun","verb"])+".com"
    return dom
def I(a):
    x = a+1
    if(x<10):
        a = "00"+str(x)
    elif(x<100):
        a = "0"+str(x)
    else:
        a = str(x)
    return "\'US0"+a+"\',"

def inO(x,y):
    from random import randint
    return "\'"+str(randint(x,y))+"\'"
    
def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o


for i in range(120):
    first = names.get_first_name()
    toFile("usr.txt","INSERT INTO USERS VALUES("+I(i)+"\'"+first+str(randint(0,999))+"\',\'"+first+"\',\'"+names.get_last_name()+"\',\'"+str(pgen())+"\');\n")
# ,"+inO(1000000000000000,9999999999999999)
#  +",\'"+str.lower(first)+str(randint(0,999))+"@"+dom(randint(1,10))+"\'