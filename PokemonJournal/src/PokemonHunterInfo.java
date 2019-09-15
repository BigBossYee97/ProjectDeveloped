import java.awt.*;
import java.awt.event.*;
import java.io.PrintStream;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;



public class PokemonHunterInfo extends JFrame implements ActionListener {
    JLabel Header = new JLabel ("Pokemon Hunter Info");
    JLabel FirstName = new JLabel("First Name:");
    JLabel LastName = new JLabel ("Last Name:");
    JLabel TeamType = new JLabel ("Team Type:");
    JLabel Information = new JLabel ("Information:");
    JTextField FirstNameText = new JTextField(15);
    JTextField LastNameText = new JTextField(15);
    JComboBox TeamTypeText = new JComboBox();
    JTextArea HunterDetails = new JTextArea(7,50);
    JButton Reset = new JButton("Reset");
    JButton SearchPokemon = new JButton("Search Pokemon");
    JButton SearchPokestop = new JButton("Search Pokestop");
    JButton SearchRaid = new JButton("Search Raid");
    JButton Exit = new JButton("Exit");
    DBHandler db = new DBHandler();
    JScrollPane scroll = new JScrollPane(HunterDetails);
    
PokemonHunterInfo(){
    setLayout(new BorderLayout());
    setSize(700,700);
    setResizable(false);
    setLocationRelativeTo(null);
    setTitle("Pokemon Hunter Details");
    JPanel North = new JPanel();
    North.setLayout(new FlowLayout(FlowLayout.CENTER));
    Header.setFont(new Font("Arial Black",Font.PLAIN,32));
    North.setBackground(Color.yellow);
    North.add(Header);
    JPanel Center = new JPanel();
    Center.setLayout(new GridLayout(4,1));
    JPanel Center1 = new JPanel();
    Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
    Center1.setPreferredSize(new Dimension(100,100));
    FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
    LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
    FirstName.setPreferredSize(new Dimension(100,50));
    LastName.setPreferredSize(new Dimension(100,50));
    Center1.add(FirstName);
    Center1.add(FirstNameText);
    Center1.add(LastName);
    Center1.add(LastNameText);
    Center.add(Center1);
  
    JPanel Center3 = new JPanel();
    Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
    TeamTypeText.addItem("None");
    TeamTypeText.addItem("Valor");
    TeamTypeText.addItem("Mystic");
    TeamTypeText.addItem("Instinct");
    TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
    TeamType.setPreferredSize(new Dimension(100,100));
    Center3.add(TeamType);
    Center3.add(TeamTypeText);
    Center.add(Center3); 
    JPanel Center4 = new JPanel();
    Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
    Information.setFont(new Font("Arial Black",Font.PLAIN,12));
    Information.setPreferredSize(new Dimension(100,100));
    Center4.add(Information);
    Center.add(Center4);
    JPanel Center5 = new JPanel();
    Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
    HunterDetails.setEditable(false);
    Center5.add(scroll);
    Center.add(Center5);
    
    JPanel South = new JPanel();
    South.setLayout(new GridLayout(2,1));
    JPanel South1 = new JPanel();
    South1.setLayout(new FlowLayout(FlowLayout.CENTER));
    SearchPokestop.setFont(new Font("Arial Black",Font.PLAIN,12));
    SearchRaid.setFont(new Font("Arial Black",Font.PLAIN,12));
    Reset.setFont(new Font("Arial Black",Font.PLAIN,12));
    SearchPokemon.setFont(new Font("Arial Black",Font.PLAIN,12));
    Exit.setFont(new Font("Arial Black",Font.PLAIN,12));
    Reset.setPreferredSize(new Dimension(80,30));
    SearchPokemon.setPreferredSize(new Dimension(150,30));
    SearchPokestop.setPreferredSize(new Dimension(150,30));
    SearchRaid.setPreferredSize(new Dimension(150,30));
    Exit.setPreferredSize(new Dimension(80,30));
    South1.add(SearchPokestop);
    South1.add(SearchPokemon);
    South1.add(SearchRaid);
    South.add(South1);
    JPanel South2 = new JPanel();
    South2.setLayout(new FlowLayout(FlowLayout.CENTER));
    South2.add(Reset);
    South2.add(Exit);
    South.add(South2);
    
    add("North",North);
    add("Center",Center);
    add("South",South);
    setVisible(true);
    
    Reset.addActionListener(this);
    SearchPokemon.addActionListener(this);
    SearchPokestop.addActionListener(this);
    SearchRaid.addActionListener(this);
    Exit.addActionListener(this);
    FirstNameText.addActionListener(this);
    LastNameText.addActionListener(this);
    TeamTypeText.addActionListener(this);
    

}

public void actionPerformed(ActionEvent e){
    
    if(e.getSource() == SearchPokemon){
        db.getPokemon();
      
    }
    
    if(e.getSource() == SearchPokestop){
        db.getPokestop();
    }
    
    
    if(e.getSource() == SearchRaid){
        db.getRaid();
    }
    
    if(e.getSource() == Reset){
        TeamTypeText.setSelectedIndex(0);
        HunterDetails.setText("");
        FirstNameText.setText("");
        LastNameText.setText("");
        
    }
    
    if(e.getSource() == Exit){
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
    
  
    public void getPokemon() {
       
       HunterDetails.setText("");
       boolean CheckUser = false;
        try {
           String firstname = FirstNameText.getText();
           String lastname = LastNameText.getText();
           if(firstname.equals("") && lastname.equals("")){
               JOptionPane.showMessageDialog(null, "Please enter the first name and last name of pokemon hunter to get data","Alert",JOptionPane.INFORMATION_MESSAGE);
           }
           
            HunterDetails.append("      Pokemon\tType\tCP\tDate Caught\tWeight\tHeight" + "\n");
            HunterDetails.append("______________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM HunterRecord");
            while (results.next()) {
               String array[] = {results.getString("FirstName"),results.getString("LastName"),results.getString("TeamType"),results.getString("PokemonName"),results.getString("PokemonType"),results.getString("CPTotal"),results.getString("DateCaught"),results.getString("Weight"),results.getString("Height")};
               
                if(firstname.equals(array[0]) && lastname.equals(array[1]) && TeamTypeText.getSelectedItem().equals(array[2])){
                    HunterDetails.append("      " + array[3] + "\t");
                    HunterDetails.append(array[4] + "\t");
                    HunterDetails.append(array[5] + "\t");
                    HunterDetails.append(array[6] + "\t");
                    HunterDetails.append(array[7] + " kg\t");
                    HunterDetails.append(array[8] + " cm\n");
                    CheckUser = true;
                }
               
     
                     
            }
            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid Pokemon Hunter","Alert",JOptionPane.INFORMATION_MESSAGE);
            }
            
            
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
        
        
    }


      
        
public void getPokestop() {
       HunterDetails.setText("");
       boolean CheckUser = false;
        try {
           String firstname = FirstNameText.getText();
           String lastname = LastNameText.getText();
           
           if(firstname.equals("") && lastname.equals("")){
               JOptionPane.showMessageDialog(null, "Please enter the first name and last name of pokemon hunter to get data","Alert",JOptionPane.INFORMATION_MESSAGE);
           }
           
            HunterDetails.append("          Pokestop Visited\tDate\tTime\tItem Received" + "\n");
            HunterDetails.append("______________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM Pokestop");
            while (results.next()) {
               String array[] = {results.getString("FirstName"),results.getString("LastName"),results.getString("TeamType"),results.getString("PokestopVisited"),results.getString("DateVisit"),results.getString("Time"),results.getString("Item")};
                if(firstname.equals(array[0]) && lastname.equals(array[1]) && TeamTypeText.getSelectedItem().equals(array[2])){
                    HunterDetails.append("          " + array[3] + "\t");
                    HunterDetails.append(array[4] + "\t");
                    HunterDetails.append(array[5] + "\t");
                    HunterDetails.append(array[6] + "\n");
                    CheckUser = true;
                    
                }
       
            }
            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid Pokemon Hunter");
            }
            
            
            
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

public void getRaid() {
       HunterDetails.setText("");
       boolean CheckUser = false;
        try {
           String firstname = FirstNameText.getText();
           String lastname = LastNameText.getText();
           
           if(firstname.equals("") && lastname.equals("")){
               JOptionPane.showMessageDialog(null, "Please enter the first name and last name of pokemon hunter to get data","Alert",JOptionPane.INFORMATION_MESSAGE);
           }
           
            HunterDetails.append("      Raid Boss" + "\t" + "Date" + "\t" + "Time" + "\t" + "Venue" + "\t" + "Result" + "\n");
            HunterDetails.append("______________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM Raid");
            while (results.next()) {
               String array[] = {results.getString("FirstName"),results.getString("LastName"),results.getString("TeamType"),results.getString("RaidBoss"),results.getString("DateFight"),results.getString("Time"),results.getString("Venue"),results.getString("Result")};
                if(firstname.equals(array[0]) && lastname.equals(array[1]) && TeamTypeText.getSelectedItem().equals(array[2])){
                    HunterDetails.append("      " + array[3] + "\t");
                    HunterDetails.append(array[4] + "\t");
                    HunterDetails.append(array[5] + "\t");
                    HunterDetails.append(array[6] + "\t");
                    HunterDetails.append(array[7] + "\n");
                    CheckUser = true;
                }
                
              
                     
            }
            

            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid Pokemon Hunter");
            }
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }
        }
}

