def problem1(input):
    result = 0
    for i in range(1, len(input)):
        if input[i] > input[i-1]:
            result += 1
    return result

def problem2(input):
    result = 0
    for i in range(0, len(input)-3):
        if input[i+3] > input[i]:
            result += 1
    return result


scans = [int(line) for line in open('input.txt').read().splitlines()]
print("Problem 1 answer : " + str(problem1(scans)))
print("Problem 2 answer : " + str(problem2(scans)))
