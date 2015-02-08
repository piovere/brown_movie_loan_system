from django.db import models

# Create your models here.
class Person(models.Model):
	first_name = models.CharField(max_length=200)
	last_name = models.CharField(max_lenth=200)
	room = models.CharField(max_length=5)
	
	# Enumerating the portals
	peters = "Peters"
	rogers = "Rogers"
	holmes = "Holmes"
	tucker = "Tucker"
	harrison = "Harrison"
	mcguffey = "McGuffey"
	gildersleeve = "Gildersleeve"
	venable = "Venable"
	davis = "Davis"
	mallet = "Mallet"
	long_portal = "Long" # Unfortunately, "long" is a Python keyword
	smith = "Smith"

	portal_choices = (
		(peters, "Peters"),
		(rogers, "Rogers"),
		(holmes, "Holmes"),
		(tucker, "Tucker"),
		(harrison, "Harrison"),
		(mcguffey, "McGuffey"),
		(gildersleeve, "Gildersleeve"),
		(venable, "Venable"),
		(davis, "Davis"),
		(mallet, "Mallet"),
		(long_portal, "Long"),
		(smith, "Smith"),
	)
	portal = models.CharField(max_length=13,
		                      choices=portal_choices,
		                      default=mcguffey)
	phone = models.CharField(max_length=20)
	email = models.EmailField(unique=True)
	comments = models.TextField()

class Video(models.Model):
	title = models.CharField(max_length=200)
	year = models.PositiveSmallIntegerField()
	link = models.PositiveIntegerField()
	genre = models.ManyToManyField('Genres')
	owner = models.ForeignKey(Person)
	format = models.ForeignKey('Formats')

class Genres(models.Model):
	genre = models.URLfield()

class Formats(models.Model):
	format = models.CharField(max_length=100)

class Checkout(models.Model):
	video = models.ForeignKey(Video)
	owner = models.ForeignKey(Person)
	holder = models.ForeignKey(Person)
	