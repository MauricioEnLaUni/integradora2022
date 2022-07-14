from random import randint
from wonderwords import RandomWord
from sys import stdout

# Stores stdout so it can be restored later, don't really know if I have to do this.
or_stdout = stdout

# Assigns alis to RandomWord
r = RandomWord()
# Opens file to edit.
f = open("prov.txt","a")
def h(x):
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
for i in range(30):
    dom = h(randint(1,10))
    name = r.word(include_parts_of_speech=["noun"])
    f.write("INSERT INTO PROVIDER VALUES(NULL,\'"+name+"\',\'"+str(randint(1000000000000000,9999999999999999))+"\',\'"+str(randint(1000000000,9999999999))+"\',\'"+r.word(include_parts_of_speech=["adjectives"])+r.word(include_parts_of_speech=["verb","noun"])+str(randint(0,9999))+"@"+dom+"\',\'"+name+dom[-4:]+"\');\n")

# Restores stdout to the initial value, once again, I'm not sure this is necessary at all.
stdout = or_stdout