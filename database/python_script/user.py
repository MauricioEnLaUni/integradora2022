def toFile(x,y):
    from sys import stdout
    o = stdout
    f = open(x,"a")
    f.write(y)
    stdout = o
def nameMe():
    from wonderwords import RandomWord
    r = RandomWord()
    return "\'"+r.word(include_parts_of_speech=["adjective"])+" "+r.word(include_parts_of_speech=["noun","verb"])+"\'"

def personal():
    import names
    from random import randint
    first = names.get_first_name()
    last = names.get_last_name()
    ex = "\'"+first+str(randint(0,9900))+"\',"+nameMe()+",\'"+first+"\',\'"
    return ex + last+"\',\'"

def pgen():
    from string import ascii_lowercase,ascii_uppercase,digits
    import numpy
    #define data
    lower = ascii_lowercase
    upper = ascii_uppercase
    num = digits
    #combine the data
    suma = lower + upper + num
    choices = numpy.random.choice([char for char in suma], size = 32, replace=True)
    # use random 
    # temp = sample(all,64)
    return "".join(choices)
    
for i in range(1,11,1):
    toFile("user.txt","INSERT INTO USERS VALUES(\'\',"+personal()+
    pgen()+"\',\'"+pgen()+"\',NULL,NULL,3);\n")