class Defo:
    # Creates a static method that will give a random date between
    # the arguments
    @staticmethod
    def rrD(x0,x1,x2,y0,y1,y2):
        from datetime import timedelta,date
        d = date(x0,x1,x2) + timedelta(days=randrange((date(y0,y1,y2)-date(x0,x1,x2)).days))
        return "\'"+str(d)+"\'"
    
    @staticmethod
    def rrN(x):
        from random import randint
        return "\'"+str(randint(1,x))+"\'"

    @staticmethod
    def crN():
        from random import randint
        return "\'"+str(randint(1000000000000000,9999999999999999))+"\'"

    @staticmethod
    def I(x):
        return "0"+str(x)+"\',"
        
    @staticmethod
    def inO():
        from random import randint,random
        gd = randint(300,1999)+random()
        return str(gd)+","+str(round(gd*1.22,2))
        
    @staticmethod
    def toFile(x,y):
        from sys import stdout
        o = stdout
        f = open(x,"a")
        f.write(y)
        sys.stdout = o
        
    @staticmethod
    def nameMe(x):
        from wonderwords import RandomWord
        r = RandomWord()
        if(x == 1 or x != 2):
            return "\'"+r.word(include_parts_of_speech=["noun","verb"])+"\'"
        elif(x == 2):
            return "\'"+r.word(include_parts_of_speech=["adjective"])+" "+r.word(include_parts_of_speech=["noun","verb"])+"\'"