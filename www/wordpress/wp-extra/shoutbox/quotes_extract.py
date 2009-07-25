import sys, re, urllib2

REX = re.compile(sys.argv[1])
DAT = urllib2.urlopen(sys.argv[2]).read()

for name, quote in REX.findall(DAT):
    print 'array("%s", "%s"),' % (name, quote.replace('\n',''))
