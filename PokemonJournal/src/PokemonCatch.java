import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;
import java.sql.PreparedStatement;

public class PokemonCatch extends JFrame implements ActionListener {
        JLabel Header = new JLabel("Pokemon");
        JLabel FirstName = new JLabel("First Name:");
        JLabel LastName = new JLabel("Last Name:");
        JLabel TeamType = new JLabel("Team Type:");
        JLabel PokemonName = new JLabel("Pokemon Name:");
        JLabel PokemonType = new JLabel("Pokemon Type:");
        JLabel CPTotal = new JLabel("CP Total:");
        JLabel DateCaught = new JLabel("Date Caught:");
        JLabel Weight = new JLabel("Weight:");
        JLabel Height = new JLabel("Height:");
        JTextField FirstNameText = new JTextField(15);
        JTextField LastNameText = new JTextField(15);
        JComboBox TeamTypeText = new JComboBox();
        JTextField PokemonNameText = new JTextField(15);
        JTextField PokemonTypeText = new JTextField(15);
        JTextField CPTotalText = new JTextField(15);
        JTextField DateCaughtText = new JTextField(15);
        JTextField WeightText = new JTextField(15);
        JTextField HeightText = new JTextField(15);
        JButton CatchButton = new JButton("Catch");
        JButton ResetButton = new JButton("Reset");
        JButton ExitButton = new JButton("Exit");
        DBHandler db = new DBHandler();
        
PokemonCatch(){
        setLayout(new BorderLayout());
        setSize(500,700);
        setResizable(false);
        setLocationRelativeTo(null);
        setTitle("Pokemon Catch");
        //setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        Header.setFont(new Font("Arial Black",Font.PLAIN,32));
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout()); 
        North.add(Header);
        North.setBackground(Color.YELLOW);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(8,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center6 = new JPanel();
        Center6.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center7 = new JPanel();
        Center7.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center8 = new JPanel();
        Center8.setLayout(new FlowLayout(FlowLayout.CENTER));
        JPanel Center9 = new JPanel();
        Center.setLayout(new FlowLayout(FlowLayout.CENTER));
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        Center.add(Center6);
        Center.add(Center7);
        Center.add(Center8);
        Center.add(Center9);
        
        FirstName.setPreferredSize(new Dimension(120,40));
        LastName.setPreferredSize(new Dimension(120,40));
        TeamTypeText.addItem("None");
        TeamTypeText.addItem("Valor");
        TeamTypeText.addItem("Mystic");
        TeamTypeText.addItem("Instinct");
        TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
        TeamType.setPreferredSize(new Dimension(120,40));
        PokemonName.setPreferredSize(new Dimension(120,40));
        PokemonType.setPreferredSize(new Dimension(120,40));
        CPTotal.setPreferredSize(new Dimension(120,40));
        DateCaught.setPreferredSize(new Dimension(120,40));
        Weight.setPreferredSize(new Dimension(120,40));
        Height.setPreferredSize(new Dimension(120,40));
        FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
        LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
        PokemonName.setFont(new Font("Arial Black",Font.PLAIN,12));
        PokemonType.setFont(new Font("Arial Black",Font.PLAIN,12));
        CPTotal.setFont(new Font("Arial Black",Font.PLAIN,12));
        DateCaught.setFont(new Font("Arial Black",Font.PLAIN,12));
        Height.setFont(new Font("Arial Black",Font.PLAIN,12));
        Weight.setFont(new Font("Arial Black",Font.PLAIN,12));
        Center1.add(FirstName);
        Center1.add(FirstNameText);
        Center2.add(LastName);
        Center2.add(LastNameText);
        Center3.add(PokemonName);
        Center3.add(PokemonNameText);
        Center4.add(PokemonType);
        Center4.add(PokemonTypeText);
        Center5.add(CPTotal);
        Center5.add(CPTotalText);
        Center6.add(DateCaught);
        Center6.add(DateCaughtText);
        Center7.add(Weight);
        Center7.add(WeightText);
        Center8.add(Height);
        Center8.add(HeightText);
        Center9.add(TeamType);
        Center9.add(TeamTypeText);
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(2,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout());
        CatchButton.setPreferredSize(new Dimension(100,40));
        CatchButton.setFont(new Font("Arial Black",Font.PLAIN,12));
        South1.add(CatchButton);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout());
        ResetButton.setPreferredSize(new Dimension(100,40));
        ExitButton.setPreferredSize(new Dimension(100,40));
        ResetButton.setFont(new Font("Arial Black",Font.PLAIN,12));
        ExitButton.setFont(new Font("Arial Black",Font.PLAIN,12));
        South2.add(ResetButton);
        South2.add(ExitButton);
        South.add(South1);
        South.add(South2); 
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        FirstNameText.addActionListener(this);
        LastNameText.addActionListener(this);
        PokemonNameText.addActionListener(this);
        PokemonTypeText.addActionListener(this);
        CPTotalText.addActionListener(this);
        DateCaughtText.addActionListener(this);
        WeightText.addActionListener(this);
        HeightText.addActionListener(this);
        TeamTypeText.addActionListener(this);
        CatchButton.addActionListener(this);
        ResetButton.addActionListener(this);
        ExitButton.addActionListener(this);
}

public void actionPerformed(ActionEvent e){
    
    
    if(e.getSource() == CatchButton){
        String firstname = FirstNameText.getText();
        String lastname = LastNameText.getText();
        String pokemonName = PokemonNameText.getText();
        String pokemonType = PokemonTypeText.getText();
        String CP = CPTotalText.getText();
        String DateCaught = DateCaughtText.getText();
        String Height = HeightText.getText();
        String Weight = WeightText.getText();
        String Team = (String)TeamTypeText.getSelectedItem();
       
        
        if(firstname.equals("") || lastname.equals("") || Team.equals("") || pokemonName.equals("") || pokemonType.equals("") || CP.equals("") || DateCaught.equals("") || Weight.equals("") || Height.equals("")){
            JOptionPane.showMessageDialog(null,"Please do not fill any blank empty.");
        }
        else{
        boolean ok = db.CatchPokemon(firstname,lastname,Team,pokemonName,pokemonType,CP,DateCaught,Weight,Height);
        }
    }
    
    
    if(e.getSource() == ResetButton){
        FirstNameText.setText("");
        LastNameText.setText("");
        PokemonNameText.setText("");
        PokemonTypeText.setText("");
        CPTotalText.setText("");
        DateCaughtText.setText("");
        HeightText.setText("");
        WeightText.setText("");
        TeamTypeText.setSelectedIndex(0);
 
    }
    
    if(e.getSource() == ExitButton){
        System.exit(0);
    }
}


class DBHandler {
    private Statement myStatement;

    public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonHunter.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public boolean CatchPokemon(String firstname, String lastname,String Team, String pokemonName, String pokemonType, String CP, String DateCaught,String Weight, String Height) {  // method to insert record into the table Video
        String array[] = {firstname,lastname,Team,pokemonName,pokemonType,CP,DateCaught,Weight,Height};
        String writeString =
            "INSERT INTO HunterRecord(FirstName,LastName,TeamType,PokemonName,PokemonType,CPTotal,DateCaught,Weight,Height) VALUES('"
            + array[0] + "', '" + array[1] + "', '" + array[2] + "', '" + array[3] + "', '" + array[4] + "', '" + array[5] + "', '" + array[6] + "', '" + array[7] + "', '" + array[8] + "')";
        try {
            
            myStatement.executeUpdate(writeString);
        }
        
        catch (SQLException sqle) {
            JOptionPane.showMessageDialog(null,"Catch Failed","Info",JOptionPane.INFORMATION_MESSAGE);
            return false; 
        }
        JOptionPane.showMessageDialog(null,"Catch Success","Info",JOptionPane.INFORMATION_MESSAGE);
        return true; 
    }
}
}
