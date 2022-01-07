#include <iostream>
#include <fstream>
#include <vector>

using namespace std;

int problem1(vector<pair<string, int> > vect)
{
    int depth = 0;
    int horizontal = 0;

    for (int i = 0; i < vect.size(); i++)
    {
        if (vect[i].first == "up")
        {
            depth -= vect[i].second;
        }
        else if (vect[i].first == "down")
        {
            depth += vect[i].second;
        }
        else if (vect[i].first == "forward")
        {
            horizontal += vect[i].second;
        }
    }
    return depth * horizontal;
}

int problem2(vector<pair<string, int> > vect)
{
    int depth = 0;
    int horizontal = 0;
    int aim = 0;


    for (int i = 0; i < vect.size(); i++)
    {
        if (vect[i].first == "up")
        {
            aim -= vect[i].second;
        }
        else if (vect[i].first == "down")
        {
            aim += vect[i].second;
        }
        else if (vect[i].first == "forward")
        {
            horizontal += vect[i].second;
            depth += aim * vect[i].second;
        }
    }
    return depth * horizontal;
}

int main()
{
    string filename("input.txt");
    vector<pair<string, int> > vect;
    string line;
    ifstream input_file(filename);

    while (getline(input_file, line))
    {
        vect.push_back(make_pair((line.substr(0, line.find(' '))), stoi(line.substr(line.find(' ') + 1))));
    }

    cout << "Answer 1: " << problem1(vect) << endl;
    cout << "Answer 2: " << problem2(vect) << endl;
    input_file.close();
    return EXIT_SUCCESS;
}