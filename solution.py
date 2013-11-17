#!/usr/bin/env python

def max_from_left(values):
	max = 0
	max_values = list()

	for i in values:
		if i > max:
			max = i

		max_values.append(max)

	return max_values

def max_from_right(values):
	# pass max_from_left reversed values and reverse
	return reversed(max_from_left(reversed(values)))

def water_volume(land):
	l_max = max_from_left(land)
	r_max = max_from_right(land)

	# contour = water + land
	contour = [min(x, y) for x, y in zip(l_max, r_max)]

	# water = contour - land
	water = [x - y for x, y in zip(contour, land)]

	volume = sum(water)

	return volume

if __name__ == '__main__':
	land = [2, 3, 5, 1, 2, 3, 4, 7, 7, 6]

	print(water_volume(land))
