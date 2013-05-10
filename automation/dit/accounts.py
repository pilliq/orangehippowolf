import urllib
import urllib2

student_url = 'http://cs336-52.rutgers.edu/public/index.php/signup/student'
instructor_url = 'http://cs336-52.rutgers.edu/public/index.php/signup/instructor'
#password = 'password'

def output(stuff):
    print(stuff)

def request(url, values):
    user_agent = 'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT)'
    header = { 'User-Agent' : user_agent }

    data = urllib.urlencode(values)
    req = urllib2.Request(url, data, header)  
    
    return urllib2.urlopen(req)

def parse(line):
    return tuple([x.strip() for x in line.split('|')])

def load(f):
    fp = open(f, 'r')
    for line in fp:
	entry = parse(line)
	if entry[0] == 's':
	    print(entry)
	    create_student(*entry[1:])
	elif entry[0] == 'i':
	    print(entry)
	    create_instructor(*entry[1:])

def create_instructor(first_name, last_name, netid, email, password, department):
    values = {'first_name': first_name,
	      'last_name': last_name,
	      'netid': netid,
	      'email': email,
	      'password': password,
	      'password2': password,
	      'department': department
    }

    response = request(instructor_url, values)
    return response.read()

def create_student(first_name, last_name, ruid, netid, email, password, grad_month, grad_year, major_credits, credits, gpa, major0, major1, major2):
    values = {'first_name': first_name,
	      'last_name': last_name,
	      'ruid': ruid,
	      'netid': netid,
	      'email': email,
	      'password': password,
	      'password2': password,
	      'gradmonth': grad_month,
	      'gradyear': grad_year,
	      'gpa': gpa,
	      'credits': credits,
	      'major_credits': major_credits,
	      'major0': major0,
	      'major1': major1,
	      'major2': major2
    }

    response = request(student_url, values)
    return response.read()

if __name__ == '__main__':
    load('/home/pquiza/dit/accounts.dat')
