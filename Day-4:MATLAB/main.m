
file = 'input.txt';

data = readtable(file, Delimiter = {'comma'});

bingo_rolls = [str2double(data.Var1{1}) table2array(data(1, 2:end))];
data = readtable(file, Delimiter = {'space'}, LeadingDelimitersRule = 'ignore', ConsecutiveDelimitersRule = 'join');
for i = (height(data) - 4):-5:1
    bingo_cards((i + 4)/5) = {table2array(data(i:i+4, :))};
end

first_score = -1;
for roll = bingo_rolls
    for card = 1:numel(bingo_cards)
        if bingo_cards{card}(1, 1) == -2, continue, end
        bingo_cards{card}(roll == bingo_cards{card}) = -1;
        if any(sum(bingo_cards{card}, 1) == 5*-1) || any(sum(bingo_cards{card}, 2) == 5*-1)
            score = roll * sum(bingo_cards{card}(bingo_cards{card}(:) ~= -1));
            bingo_cards{card}(1, 1) = -2;
            if first_score == -1
                first_score = score;
            end
        end
    end
end
disp(" ")
disp("Answer 1: " + first_score)
disp("Answer 2: " + score)